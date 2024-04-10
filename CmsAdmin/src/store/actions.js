import axiosClient from "../axios";


export function login({ commit }, data) {
    return axiosClient.post("/admin/login", data).then(({ data }) => {
        commit("setUser", data.data.user);
        commit("setToken", data.data.token);

        return data;
    });
}
