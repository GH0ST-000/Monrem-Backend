import axiosClient from "../axios";
export function getUser({ commit }, data) {
    return axiosClient.get("/admin/user", data).then(({ data }) => {
        commit("setUser", data);
        return data;
    });
}

export function login({ commit }, data) {
    return axiosClient.post("/admin/login", data).then(({ data }) => {
        commit("setUser", data.data.user);
        commit("setToken", data.data.token);
        return data;
    });
}

export function createPosts({ commit }, data) {
    return axiosClient.post(`/admin/posts`, data).then(({ data }) => {
        return data;
    });
}
export function updateStatus({ commit }, data) {
    return axiosClient.post(`/admin/update-status`, data).then(({ data }) => {
        return data;
    });
}

export function updatePost({ commit }, data) {
    const id = data.id
    const form = new FormData();
    form.append('id', data.id);
    form.append('title', data.title);
    form.append('content', data.content);
    form.append('image', data.image);
    form.append('_method', 'PUT');
    data = form;
    return axiosClient.post(`/admin/posts/${id}`, data)
}

export function getPosts({ commit }, data) {
    return axiosClient.get(`/admin/posts`, data).then(({ data }) => {
        return data;
    });
}

export function getPost({ commit }, id) {
    return axiosClient.get(`/admin/posts/${id}` ).then( ({data})=>{
        return data
    });
}

export function deletePost({ commit }, id) {
    return axiosClient.delete(`/admin/posts/${id}` ).then( ({data})=>{
        return data
    });
}






