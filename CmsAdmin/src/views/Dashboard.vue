<template>
    <Success v-show="SuccessIsOpen"/>
    <Error  v-show="errorMgs"/>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">

            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <button type="button" class="block rounded-md bg-indigo-600
                px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500
                 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                 focus-visible:outline-indigo-600" @click="OpenModal(null)">Add</button>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div>
                        <ul
                            @dragover.prevent
                            @drop="drop"
                            @dragenter="dragEnter"
                            @dragleave="dragLeave"
                        >
                            <li
                                class="cursor-pointer"
                                v-for="(item, index) in items"
                                :key="item.id"
                                :draggable="true"
                                @dragstart="dragStart(index)"
                                @dragend="dragEnd"
                                @dragover.prevent
                                @drop="drop"
                                @dragenter="dragEnter"
                                @dragleave="dragLeave"

                            >
                                <div class="flex justify-between items-center">
                                    <div>{{ item.id }}</div>
                                    <div>{{ item.title }}</div>
                                    <div><span :class="item.status === 1 ? 'bg-green-400' : 'bg-red-700 text-white'" class="p-1 rounded-md">{{ item.status === 1 ? 'Active' : 'Inactive' }}</span></div>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" :checked="item.status===1" @change="updateStatus(item.id)">
                                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300
                                         peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                                         peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5
                                         after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full
                                          after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">

                                        </div>
                                    </label>
                                    <div class="text-blue-500"  @click="OpenModal(item.id)">Edit</div>
                                    <div class="text-red-500"  @click="DeleteItems(item.id)">Delete</div>
                                    <div><span>{{new Date(item.created_at).toLocaleTimeString()}}</span></div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <Modal v-if="modalIsOpen" @submit="handleModalSubmit"
           :events="eventsName"
           @update="handleModalUpdate"   @close="modalIsOpen =false" >
        <div class="block w-full">
            <div class="">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                    <input required v-model="about.header" type="text" name="title" id="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Title" />
                </div>
            </div>

            <div class="pt-4">
                <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                <div class="mt-2" >
                    <ckeditor class="ps-6"  :editor="editor" v-model="editorData" :config="editorConfig" ></ckeditor>
                </div>
            </div>

            <div class="col-span-full pt-4">
                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>

                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                        <div v-if="imgURL" class="w-32 h-32 ms-8 mb-12">
                            <img :src="imgURL"  alt="image not found"/>
                        </div>

                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                            <label for="file-upload"
                                   class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="file-upload" name="file-upload" type="file" class="sr-only" @change="handleImageUpload"/>
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">PNG, JPG up to 2 MB</p>
                    </div>
                </div>
            </div>
        </div>

    </Modal>
</template>

<script setup>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Modal from "../components/modal/Modal.vue";
import Error from "../components/Partials/Error.vue";
import Success from "../components/Partials/Success.vue";
import { Switch } from '@headlessui/vue'
const enabled = ref(false)
import {onMounted, reactive, ref} from "vue";

import store from "../store/index.js";
import {getPost, getPosts} from "../store/actions.js";
import {data} from "autoprefixer";
let eventsName = ref('')
const modalIsOpen = ref(false);
const imgURL = ref('');
const errorMgs = ref(false);
const SuccessIsOpen = ref(false);

const editor = ClassicEditor;
const editorData = ref('');
const editorConfig = {
    toolbar: {
        items: [
            'heading',
            '|',
            'bold',
            'italic',
            '|',
            'bulletedList',
            'numberedList',
            '|',
            'link',
            '|',
            'undo',
            'redo'
        ]
    },
    language: 'en',

};



let draggedItemIndex = null;

function dragStart(index) {
    draggedItemIndex = index;
}

function dragEnd() {
    draggedItemIndex = null;
}

function dragEnter(event) {
    event.target.classList.add('drag-over');
}

function dragLeave(event) {
    event.target.classList.remove('drag-over');
}

function drop(event) {
    event.preventDefault();
    const targetIndex = Array.from(event.target.parentNode.children).indexOf(event.target);
    const draggedItem = items.value[draggedItemIndex];
    items.value.splice(draggedItemIndex, 1);
    items.value.splice(targetIndex, 0, draggedItem);
    event.target.classList.remove('drag-over');

    items.value.forEach((item, index) => {
        console.log(`Item ${item.title} - Position ${index}`);
        about.positions.push(index)
    });
}

const updateStatus = (id) => {
    const formData = new FormData();
    formData.append("id", id);
    store.dispatch('updateStatus',formData)
        .then((data) => {
            console.log(data)
            if (data.status === 200 ){
                getItems()
                SuccessIsOpen.value=true
                hideAlert()
            }
        })
}


const items = ref([])
const OpenModal = (param) =>{
    if (param !== null){
        eventsName.value='update'
        about.post_id=param;
        store.dispatch('getPost',param)
            .then((data)=>{
                if (data){
                    about.header=  data.title;
                    about.image=data.details.image;
                    editorData.value=data.details.content;
                    about.post_id=param;
                    imgURL.value=data.details.image;
                }
            })

    }else {
        eventsName.value='submit'
    }
    clearOutput()

    modalIsOpen.value = modalIsOpen.value !== true;
}

const DeleteItems = (id) => {
    store.dispatch('deletePost',id)
        .then((data)=>{
            if (data.status === 200){
                getItems()
                SuccessIsOpen.value=true
                hideAlert()
            }
        })
        .catch((err)=>{
            console.log(err)
        })
}

const about =reactive({
    header:'',
    description:'',
    image:'',
    post_id:'',
    positions:[]
});

const handleModalUpdate = (param) => {
    const params = {
        id:about.post_id,
        title:about.header,
        content:editorData.value,
        image:about.image,
    }

    store.dispatch('updatePost',params)
        .then((data)=>{
            if (data.status === 200){
                modalIsOpen.value=false
                getItems()
                SuccessIsOpen.value=true
                hideAlert()
                clearOutput()
            }
        })
        .catch((err)=>{
            console.log(err)
        })
};
const handleModalSubmit =() => {
    const formData = new FormData();
    formData.append("title", about.header);
    formData.append("content", editorData.value);
    formData.append("image", about.image);
    store.dispatch('createPosts',formData)
        .then((data)=> {
            if (data.status === 200){
                modalIsOpen.value=false
                getItems()
                SuccessIsOpen.value=true
                hideAlert()
                clearOutput()
            }
        })
        .catch((error) =>{
            if (error.message){
                errorMgs.value=true
                hideAlert()
            }

        })
}




function hideAlert(){
    setTimeout(function (){
        SuccessIsOpen.value=false
        errorMgs.value=false
    },2000)
}

function clearOutput(){
    about.header='';
    editorData.value=''
    about.image='';
    imgURL.value=''
}


function handleImageUpload(event) {

    const file = event.target.files[0];
    about.image=file;
    imgURL.value = URL.createObjectURL(file);
}


function getItems(){
    store.dispatch('getPosts')
        .then((data)=>{
            items.value = data
        })
}

onMounted(() => {
    getItems()
})
</script>

<style scoped>
ul {
    list-style-type: none;
    padding: 0;
}

li {
    background-color: #f4f4f4;
    padding: 10px;
    margin-bottom: 5px;
}

.drag-over {
    background-color: #cfd8dc;
}
</style>
