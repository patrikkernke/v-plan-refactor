<template>
    <Head title="Calendar" />

    <BreezeAuthenticatedLayout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">

            <div v-for="day in days"
                 class="flex justify-between px-4 py-3 group"
                 :class="dayStyle(day)"
            >
                <div class="font-bold text-gray-400">
                    <div class="text-xl leading-none">
                        {{ day.day}}
                    </div>
                    <div class="text-sm tracking-wide uppercase">
                        {{ day.weekdayShort }}
                    </div>
                </div>

                <div class="opacity-0 group-hover:opacity-100 transition duration-500">
                    <AddEventDropdown class="mt-2" />
                </div>
            </div>

        </div>
    </BreezeAuthenticatedLayout>

</template>

<script>

import {Head, Link} from '@inertiajs/inertia-vue3'
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated"
import AddEventDropdown from "@/Components/AddEventDropdown"

export default {
    components: {
        Head,
        BreezeAuthenticatedLayout,
        Link,
        AddEventDropdown
    },

    props: {
        days: {
            type: Array,
            default: []
        }
    },

    data() {
        return {
            dayStyles: {
                neutral: 'border-b',
                saturday: 'bg-gray-200 border-gray-300 border-b ',
                sunday: 'bg-gray-200 border-gray-500 border-b-2',
                today: 'bg-white'
            }
        }
    },

    methods: {
        dayStyle(day) {
            if (day.isToday) return this.dayStyles.today
            if (day.isSaturday) return this.dayStyles.saturday
            if (day.isSunday) return this.dayStyles.sunday

            return this.dayStyles.neutral
        }
    }
}
</script>
