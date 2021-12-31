<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="close">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                </TransitionChild>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

                    <form
                        @submit.prevent="submit"
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    >
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                    Add document
                                </DialogTitle>
                                <div class="mt-2">

                                    <div>
                                        <Label for="label" value="Label" />
                                        <Input
                                            id="label"
                                            type="text"
                                            class="mt-1 block w-full"
                                            autofocus
                                            v-model="form.label"
                                        />
                                    </div>
                                    <InputError class="mt-1" :message="form.errors.label" />

                                    <div class="mt-4">
                                        <div class="flex items-center space-x-2" v-if="!! form.document">
                                            <MinusCircleIcon class="w-5 h-5 text-gray-300 hover:text-red-600 cursor-pointer" @click="clearFileInput"/>
                                            <span>{{ form.document.name }}</span>
                                        </div>
                                        <div v-show="! form.document">
                                            <label
                                                for="document-upload"
                                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-sm font-medium focus:outline-none transition ease-in-out duration-150 focus:ring-2 focus:ring-offset-2 text-white bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-900 focus:outline-none focus:ring-indigo-900 cursor-pointer"
                                            >
                                                Upload document
                                            </label>

                                            <input
                                                id="document-upload"
                                                name="document-upload"
                                                type="file"
                                                @input="documentInput"
                                                ref="refFileInput"
                                                class="hidden"
                                            />
                                        </div>
                                    </div>
                                    <InputError class="mt-1" :message="form.errors.document" />

                                </div>
                            </div>

                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <Button
                                class="sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Add
                            </Button>

                            <Button
                                type="button"
                                appearance="secondary"
                                @click="close"
                                class="sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Cancel
                            </Button>

                            <progress v-if="form.progress" :value="form.progress.percentage" max="100" class="mx-8">
                                {{ form.progress.percentage }}%
                            </progress>
                        </div>
                    </form>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import { ref } from 'vue'
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import Button from "@/Components/Button"
import ButtonLink from "@/Components/ButtonLink"
import Input from "@/Components/Input"
import Label from "@/Components/Label"
import {MinusCircleIcon} from "@heroicons/vue/solid"
import InputError from "@/Components/InputError"

export default {
    components: {
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        Button,
        ButtonLink,
        Input,
        Label,
        MinusCircleIcon,
        InputError
    },


    props: {
        open: {
            type: Boolean,
            default: false
        },
        category: {
            type: String,
            default: null
        }
    },

    data() {
        return {
            form: this.$inertia.form({
                label: null,
                document: null,
                category: null
            })
        }
    },

    methods: {
        close() {
            this.$emit('close')
            this.form.reset()
            this.resetFields()
        },

        documentInput(event) {
            this.form.document = event.target.files[0]
            this.$refs.refFileInput.value = null
        },

        clearFileInput() {
            this.form.document = null
        },

        submit() {
            this.form.category = this.category;
            this.form.post('/digital-board', {
                onSuccess: () => {
                    this.close()
                }
            })
        },

        resetFields() {
            this.form.label = null;
            this.form.document = null;
            this.form.category = null;
            this.$refs.refFileInput.value = null
        }
    },

}
</script>
