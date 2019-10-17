<template>
    <div>
        <full-calendar :events="events" />
    </div>
</template>

<script>
    import { FullCalendar } from 'vue-full-calendar';
    import 'fullcalendar/dist/fullcalendar.css';
    import moment from 'moment';

    export default {
        data () {
            return {
                events: []
            }
        },

        mounted() {
            // this.getDays();
            this.$eventBus.$on('EVENT_SET', (payload) => {
                this.events = [
                    payload
                ]
            });
        },

        components: {
            FullCalendar,
        },

        methods: {
            getDays() {
                this.$eventBus.$on('EVENT_SET', (payload) => {
                    let start = moment(payload.start, 'YYYY-MM-DD');
                    let end = moment(payload.end, 'YYYY-MM-DD');
                    let day = 0;
                    let result = [];
                    let current = start.clone();

                    while (current.day(7+ day).isBefore(end)) {
                        result.push(current.clone());
                    }

                    console.log(result.map(m => m.format('LLLL')));
                })
            }
        }
    }
</script>