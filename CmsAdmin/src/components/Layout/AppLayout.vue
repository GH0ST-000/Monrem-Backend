<template>
    <div class="min-h-full">

        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog as="div" class="relative z-40 lg:hidden" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" />
                </TransitionChild>
                <div class="fixed inset-0 z-40 flex">
                    <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                        <DialogPanel class="relative flex w-full max-w-xs flex-1 flex-col bg-white pb-4 pt-5">
                            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                                <div class="absolute right-0 top-0 -mr-12 pt-2">
                                    <button type="button" class="relative ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                                        <span class="absolute -inset-0.5" />
                                        <span class="sr-only">Close sidebar</span>
                                        <XMarkIcon class="h-6 w-6 text-white" aria-hidden="true" />
                                    </button>
                                </div>
                            </TransitionChild>
                            <div class="mt-5 h-0 flex-1 overflow-y-auto">
                                <nav class="px-2">
                                    <div class="space-y-1">
                                        <RouterLink v-for="(item,i) in navigation" :key="item.name"  :to="item.href" class="cursor-pointer" @click="Dimgray(i)"  :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center rounded-md px-2 py-2 text-base font-medium leading-5']" :aria-current="item.current ? 'page' : undefined">
                                            <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 h-6 w-6 flex-shrink-0']" aria-hidden="true" />
                                            {{ item.name }}
                                        </RouterLink>
                                    </div>
                                </nav>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                    <div class="w-14 flex-shrink-0" aria-hidden="true">
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
        <div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col lg:border-r lg:border-gray-200 lg:bg-gray-100 lg:pb-4 lg:pt-5">
            <div class="mt-5 flex h-0 flex-1 flex-col overflow-y-auto pt-1">
                <Menu as="div" class="relative inline-block px-3 text-left">
                    <div>
                        <MenuButton class="group w-full rounded-md bg-gray-100 px-3.5 py-2 text-left text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-100">
              <span class="flex w-full items-center justify-between">
                <span class="flex min-w-0 items-center justify-between space-x-3">
                  <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" alt="" />
                  <span class="flex min-w-0 flex-1 flex-col">
                    <span class="truncate text-sm font-medium text-gray-900">{{currentUser.name}}</span>
                    <span class="truncate text-sm text-gray-500">{{currentUser.email}}</span>
                  </span>
                </span>
              </span>
                        </MenuButton>
                    </div>
                </Menu>
                <div class="mt-5 px-3">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3" aria-hidden="true">
                            <MagnifyingGlassIcon class="h-4 w-4 text-gray-400" aria-hidden="true" />
                        </div>
                        <input type="text" name="search" id="search" class="block w-full rounded-md border-0 py-1.5 pl-9 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search" />
                    </div>
                </div>
                <nav class="mt-6 px-3">
                    <div class="space-y-1">

                        <RouterLink v-for="(item,i) in navigation" :key="item.name" :to="item.href" @click="Dimgray(i)" :class="[item.current ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center rounded-md px-2 py-2 text-sm font-medium']" :aria-current="item.current ? 'page' : undefined">
                            <component :is="item.icon"  :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 h-6 w-6 flex-shrink-0']" aria-hidden="true" />
                            {{ item.name }}
                        </RouterLink>
                    </div>
                </nav>
            </div>
        </div>
        <div class="flex flex-col lg:pl-64">
            <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 border-b border-gray-200 bg-white lg:hidden">
                <button type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden" @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <Bars3CenterLeftIcon class="h-6 w-6" aria-hidden="true" />
                </button>
                <div class="flex flex-1 justify-between px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-1">
                        <form class="flex w-full md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                                    <MagnifyingGlassIcon class="h-5 w-5" aria-hidden="true" />
                                </div>
                                <input id="search-field" name="search-field" class="block h-full w-full border-transparent py-2 pl-8 pr-3 text-gray-900 focus:border-transparent focus:outline-none focus:ring-0 focus:placeholder:text-gray-400 sm:text-sm" placeholder="Search" type="search" />
                            </div>
                        </form>
                    </div>
                    <div class="flex items-center">
                        <Menu as="div" class="relative ml-3">
                            <div>
                                <MenuButton class="relative flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                    <span class="absolute -inset-1.5" />
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                </MenuButton>
                            </div>
                        </Menu>
                    </div>
                </div>
            </div>
            <main class="flex-1">
                <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="min-w-0 flex-1">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">{{displayName}}</h1>
                    </div>
                </div>

                  <div class="sm:p-8 p-3">
                      <router-view></router-view>
                  </div>

            </main>
        </div>
    </div>
</template>

<script setup>

import {computed, onMounted, ref} from 'vue'
import {
    Dialog,
    DialogPanel,
    Menu,
    MenuButton,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import { Bars3CenterLeftIcon, Bars4Icon, HomeIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import {MagnifyingGlassIcon } from '@heroicons/vue/20/solid'
import store from "../../store/index.js";
const sidebarOpen = ref(false)
const displayName= ref('Dashboard')

const navigation = [
    { name: 'Dashboard', href: '/', icon: HomeIcon, current: true },
    { name: 'Posts', href: '/posts', icon: Bars4Icon, current: false },
]
const currentUser = computed(() => store.state.user.data);


const Dimgray =(i) => {
    const selected = navigation.find(item => item.current);
    selected.current = false;
    navigation[i].current=true;
    sidebarOpen.value=false
    displayName.value = navigation[i].name
}



</script>
