<template>
    <Head title="Digitales Brett" />

    <div class="min-h-screen bg-gray-100 pt-16">

        <div class="px-8 sm:px-0 sm:w-96 sm:mx-auto">

            <h1 class="font-light text-2xl sm:text-3xl text-gray-700">
                Digitales Brett
            </h1>

            <h2 class="font-bold text-sm sm:text-base">
                Versammlung Neuwied
            </h2>

            <div class="text-base mt-8">
                Den aktuellsten Plan durch Klicken / Tippen anschauen oder herunterladen.
            </div>

            <div v-if="documents['announcement']">
                <h3 class="mt-8 font-bold">
                    Bekanntmachungen
                </h3>
                <div class="space-y-2 mt-3">
                    <PdfDownloadButton
                        v-for="doc in documents['announcement']"
                        :label="doc.label"
                        :url="route('digital-board.download', doc.id)"
                    />
                </div>
            </div>

            <div v-if="documents['public-meeting']">
                <h3 class="mt-8 font-bold">
                    Öffentliche Zusammenkünfte
                </h3>
                <div class="space-y-2 mt-3">
                    <PdfDownloadButton
                        v-for="doc in documents['public-meeting']"
                        :label="doc.label"
                        :url="route('digital-board.download', doc.id)"
                    />
                </div>
            </div>

            <div v-if="documents['midweek-meeting']">
                <h3 class="mt-8 font-bold">
                    Leben- und Dienstzusammenkunft
                </h3>
                <div class="space-y-2 mt-3">
                    <PdfDownloadButton
                        v-for="doc in documents['midweek-meeting']"
                        :label="doc.label"
                        :url="route('digital-board.download', doc.id)"
                    />
                </div>
            </div>

            <div v-if="documents['service-meeting']">
                <h3 class="mt-8 font-bold">
                    Treffpunkte
                </h3>
                <div class="space-y-2 mt-3">
                    <PdfDownloadButton
                        v-for="doc in documents['service-meeting']"
                        :label="doc.label"
                        :url="route('digital-board.download', doc.id)"
                    />
                </div>
            </div>

        </div>

    </div>
</template>

<script>

import {Head} from '@inertiajs/inertia-vue3'
import PdfDownloadButton from "@/Components/PdfDownloadButton"

export default {

    props: {
        documents: {
            type: Object,
            default: null
        }
    },

    components: {
        Head,
        PdfDownloadButton
    },
}
</script>
