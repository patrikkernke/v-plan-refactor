<template>
    <Head title="Create User" />

    <BreezeAuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create new user
            </h2>
        </template>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="mb-16">
                You can add users and give them powers. But choose wisely.
            </div>

            <div class="max-w-md bg-white rounded p-8 shadow">

                <ValidationErrors class="mb-4" />

                <form @submit.prevent="submit">
                    <div class="flex space-x-2">
                        <div class="flex-1">
                            <Label for="firstname" value="Firstname"/>
                            <Input id="firstname" type="text" class="mt-1 block w-full" v-model="form.firstname" required
                                         autofocus autocomplete="firstname"/>
                        </div>
                        <div class="flex-1">
                            <Label for="lastname" value="Lastname"/>
                            <Input id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname" required
                                         autofocus autocomplete="lastname"/>
                        </div>
                    </div>

                    <div class="mt-4">
                        <Label for="email" value="Email" />
                        <Input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <Label for="password" value="Password" />
                        <Input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <Label for="password_confirmation" value="Confirm Password" />
                        <Input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <Button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create
                        </Button>
                    </div>
                </form>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated"
import {Head} from "@inertiajs/inertia-vue3"
import ValidationErrors from "@/Components/ValidationErrors"
import Label from "@/Components/Label"
import Input from "@/Components/Input"
import Button from "@/Components/Button"

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        ValidationErrors,
        Label,
        Input,
        Button,
    },

    data() {
        return {
            form: this.$inertia.form({
                firstname: '',
                lastname: '',
                email: '',
                password: '',
                password_confirmation: '',
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
