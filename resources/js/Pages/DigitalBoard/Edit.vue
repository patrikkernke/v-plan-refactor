<template>
    <Head title="Digital Board" />

    <BreezeAuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage public information
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 px-8 py-12">
            <div class="grid sm:grid-cols-2 gap-6">

                <Card
                    title="Announcement"
                    :list="documents['announcement']"
                    @add-document="openAddDocumentModal('announcement')"
                />

                <Card
                    title="Midweek Meeting"
                    :list="documents['midweek-meeting']"
                    @add-document="openAddDocumentModal('midweek-meeting')"
                />

                <Card
                    title="Public Meeting"
                    :list="documents['public-meeting']"
                    @add-document="openAddDocumentModal('public-meeting')"
                />

                <Card
                    title="Service Meeting"
                    :list="documents['service-meeting']"
                    @add-document="openAddDocumentModal('service-meeting')"
                />

            </div>
        </div>

        <AddModal :open="addingDocument" @close="closeAddDocumentModal" :category="currentCategory" />
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated"
import {Head, Link} from "@inertiajs/inertia-vue3"
import Card from "@/Pages/DigitalBoard/Components/Card"
import AddModal from "@/Pages/DigitalBoard/Modals/Add"

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Card,
        AddModal
    },

    props: {
        documents: {
            type: Object,
            default: null
        }
    },

    data: () => {
        return {
            addingDocument: false,
            currentCategory: null,
        }
    },

    methods: {
        openAddDocumentModal(category) {
            this.addingDocument = true;
            this.currentCategory = category;
        },

        closeAddDocumentModal() {
            this.addingDocument = false;
            this.currentCategory = null;
        }
    }
}
</script>
