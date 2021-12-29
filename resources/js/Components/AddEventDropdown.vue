<template>
    <Menu as="div" class="relative inline-block text-left">
        <div>
            <MenuButton>
                <PlusCircleIcon class="text-gray-400 h-6 w-6 hover:text-indigo-600 transition" aria-hidden="true" />
            </MenuButton>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <MenuItems class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none">
                <div class="py-1">
                    <MenuItem v-slot="{ active }">
                        <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Treffpunkt</a>
                    </MenuItem>
                    <MenuItem v-slot="{ active }">
                        <a href="#" @click="test" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Öffentliche Zusammenkunft</a>
                    </MenuItem>
                </div>
                <div class="py-1">
                    <MenuItem v-slot="{ active }">
                        <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Gedächntismahl</a>
                    </MenuItem>
                    <MenuItem v-slot="{ active }">
                        <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Kongress</a>
                    </MenuItem>
                    <MenuItem v-slot="{ active }">
                        <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Dienstwoche</a>
                    </MenuItem>
                </div>
            </MenuItems>
        </transition>
    </Menu>
</template>

<script>

import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
import {PlusCircleIcon} from "@heroicons/vue/outline"

export default {
    props: {
        forDate: {
            type: String,
            default: null
        }
    },
    components: {
        Menu,
        MenuButton,
        MenuItems,
        MenuItem,
        PlusCircleIcon,
    },

    methods: {
        test() {
            alert(`Neue Öffentliche Zusammenkunft am ${this.forDate}`);
        }
    }
};
</script>
