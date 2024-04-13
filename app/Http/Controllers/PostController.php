<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Posts::with('details')->get();
    }

    public function store(PostRequest $request): \Flugg\Responder\Http\Responses\SuccessResponseBuilder
    {
        $validated = $request->validated();

        $image = $validated['image'] ?? null;
        if ($image){
            $relativePath = self::saveImage($image);
            $validated['image'] = url(Storage::url($relativePath));
        }

        $post = Posts::create([
            'title' => $validated['title'],
            'status'=>true
        ]);

        $post->details()->create([
            'content' => $validated['content'],
            'image' => $validated['image'],
        ]);

        return responder()->success();
    }
    public function show(Posts $post): Posts
    {
        return $post->load('details');
    }


    public function update(PostRequest $request, Posts $post): \Flugg\Responder\Http\Responses\SuccessResponseBuilder
    {
        $validated = $request->validated();

        if (isset($validated['image']) && !filter_var($validated['image'], FILTER_VALIDATE_URL)) {
            $relativePath = self::saveImage($validated['image']);
            $validated['image'] = url(Storage::url($relativePath));
        }
        $postFields = ['title'];
        $detailsFields = ['content','image'];

        $postUpdates = array_intersect_key($validated, array_flip($postFields));
        $detailsUpdates = array_intersect_key($validated, array_flip($detailsFields));

        $post->update($postUpdates);
        $post->details()->update($detailsUpdates);

        return responder()->success($post->refresh()->load('details'));
    }


    public function status(Request $request): \Flugg\Responder\Http\Responses\SuccessResponseBuilder
    {
        $post = Posts::findOrFail($request->id);
        $post->status = $post->status == 1 ? 0 : 1;
        $post->save();
        return responder()->success();
    }
    private function saveImage(mixed $image)
    {
        $path = 'images/' . Str::random();
        if (!Storage::exists($path)){
            Storage::makeDirectory($path,0755,true);
        }
        if (!Storage::putFileAs('public/'.$path,$image,$image->getClientOriginalName())){
            throw new \Exception('Failed to save image');
        }

        return $path . '/' . $image->getClientOriginalName();
    }

    public function destroy(Posts $post): \Flugg\Responder\Http\Responses\SuccessResponseBuilder
    {
        $post->delete();
        return responder()->success();
    }
}
