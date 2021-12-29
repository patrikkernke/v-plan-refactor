<template>
    <Head title="Calendar" />

    <BreezeAuthenticatedLayout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">

            <div v-for="day in dates"
                 class="border-l-8"
                 :class="decorationStyle(day)"
            >
                <div class="flex justify-between px-4 py-3 group"
                     :class="dayStyle(day)"
                >
                    <div>
                        <div class="flex">
                            <div class="w-20 font-bold text-gray-400">
                                <div class="text-xl leading-none">
                                    {{ day.date.day}}
                                </div>
                                <div class="text-sm tracking-wide uppercase">
                                    {{ day.date.weekdayShort }}
                                </div>
                            </div>

                            <div>
                                <div v-for="event in day.events">

                                    <div class="flex items-center space-x-4">

                                        <div class="w-16">
                                            <div class="inline-block text-center border-2 border-gray-500 font-bold text-gray-700 rounded px-2 py-0.5 text-sm">
                                                {{ event.startTime }}
                                            </div>
                                        </div>

                                        <h4 class="font-bold text-base">
                                            Public Meeting
                                        </h4>

                                    </div>


                                    <div class="pl-20">
                                        <div>
                                            <div>Wann wird Jehova eingreifen?</div>
                                            <div class="text-sm">Jeremie Sider (Neuwied)</div>
                                        </div>

                                        <div class="flex space-x-4 mt-4 text-sm">
                                            <div class="flex items-center space-x-2">
                                                <MicrophoneIcon class="w-4 h-4 text-gray-500" />
                                                <div>P. Kernke</div>
                                            </div>

                                            <div class="flex items-center space-x-2">
                                                <HandIcon class="w-4 h-4 text-gray-500" />
                                                <div>D. Schirk</div>
                                            </div>

                                            <div class="flex items-center space-x-2">
                                                <BookOpenIcon class="w-4 h-4 text-gray-500" />
                                                <div>T. Reichert</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="opacity-0 group-hover:opacity-100 transition duration-500">
                        <AddEventDropdown class="mt-2" :forDate="day.date.iso" />
                    </div>
                </div>
            </div>

        </div>
    </BreezeAuthenticatedLayout>

</template>

<script>

import {Head, Link} from '@inertiajs/inertia-vue3'
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated"
import AddEventDropdown from "@/Components/AddEventDropdown"
import {BookOpenIcon, HandIcon, MicrophoneIcon} from "@heroicons/vue/solid"
import {CheckCircleIcon} from "@heroicons/vue/outline"

export default {
    components: {
        Head,
        BreezeAuthenticatedLayout,
        Link,
        AddEventDropdown,
        MicrophoneIcon,
        HandIcon,
        BookOpenIcon,
        CheckCircleIcon
    },

    props: {
        dates: {
            type: Array,
            default: []
        }
    },

    data() {
        return {
            dayStyles: {
                base: {
                    neutral: 'border-b',
                    saturday: 'bg-gray-200 border-gray-300 border-b ',
                    sunday: 'bg-gray-200 border-gray-500 border-b-2',
                },
                decoration: {
                    neutral: 'border-transparent',
                    today: 'border-indigo-400',
                }
            }
        }
    },


    methods: {
        dayStyle(day) {
            if (day.date.isSaturday) return this.dayStyles.base.saturday
            if (day.date.isSunday) return this.dayStyles.base.sunday

            return this.dayStyles.base.neutral
        },

        decorationStyle(day) {
            if (day.date.isToday) return this.dayStyles.decoration.today

            return this.dayStyles.decoration.neutral
        }
    }
}
</script>
