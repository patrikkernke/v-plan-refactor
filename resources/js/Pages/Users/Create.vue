<template>
    <Head title="Create User" />

    <BreezeAuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create new user
            </h2>
        </template>

        <form @submit.prevent="submit"
              class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12"
        >
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Be sure using the correct email address.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <Label for="firstname" value="First name" />
                                        <Input id="firstname"
                                               type="text"
                                               class="mt-1 block w-full"
                                               v-model="form.firstname"
                                               required
                                               autofocus
                                               autocomplete="firstname"
                                        />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <Label for="lastname" value="Last name" />
                                        <Input id="lastname"
                                               type="text"
                                               class="mt-1 block w-full"
                                               v-model="form.lastname"
                                               required
                                               autofocus
                                               autocomplete="lastname^"
                                        />
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <Label for="email" value="Email address" />
                                        <Input id="email"
                                               type="text"
                                               class="mt-1 block w-full"
                                               v-model="form.email"
                                               required
                                               autofocus
                                               autocomplete="email"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200" />
                </div>
            </div>

            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">App Permissions</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Choose wisely. Great powers for this app.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white space-y-4 sm:p-6">

                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <Checkbox id="manage-users" name="manage-users" v-model:checked="form.can.login" />
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <Label for="manage-users" value="Login" />
                                            <p class="text-gray-500">Access to the app.</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <Checkbox id="manage-users" name="manage-users" v-model:checked="form.can.manageUsers" />
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <Label for="manage-users" value="Manage users" />
                                            <p class="text-gray-500">Add, edit and delete users.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200" />
                </div>
            </div>

            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Privileges</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Which tasks may be assigned?
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white space-y-4 sm:p-6">

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <Checkbox id="chairman-on-sunday" name="chairman-on-sunday" v-model:checked="form.canBe.chairmanAtPublicMeetings" />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <Label for="chairman-on-sunday" value="Chairman" />
                                        <p class="text-gray-500">Can be chairman at public meetings.</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <Checkbox id="watchtower-reader" name="watchtower-reader" v-model:checked="form.canBe.watchtowerReader" />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <Label for="watchtower-reader" value="Watchtower reader" />
                                        <p class="text-gray-500">Can be watchtower reader at public meetings.</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <Checkbox id="service-meetings-leader" name="service-meetings-leader" v-model:checked="form.canBe.serviceMeetingsLeader" />
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <Label for="service-meetings-leader" value="Leader" />
                                        <p class="text-gray-500">Can be leader at service meetings.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200" />
                </div>
            </div>

            <div class="flex justify-end">
                <Button class="text-base" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Create
                </Button>
            </div>
        </form>

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated"
import {Head} from "@inertiajs/inertia-vue3"
import ValidationErrors from "@/Components/ValidationErrors"
import Label from "@/Components/Label"
import Input from "@/Components/Input"
import Button from "@/Components/Button"
import Checkbox from "@/Components/Checkbox"

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        ValidationErrors,
        Label,
        Input,
        Button,
        Checkbox
    },

    data() {
        return {
            form: this.$inertia.form({
                firstname: '',
                lastname: '',
                email: '',
                can: {
                    login: false,
                    manageUsers: false
                },
                canBe: {
                    chairmanAtPublicMeetings: false,
                    watchtowerReader: false,
                    serviceMeetingsLeader: false,
                }
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('users.store'))
        }
    }
}
</script>
