export function setUser(state, user) {
    console.log(user)
    state.user.data = user;
}

export function setToken(state, token) {

    state.user.token = token;
    if (token) {
        localStorage.setItem('TOKEN', token)
    } else {
        localStorage.removeItem('TOKEN')

    }
}