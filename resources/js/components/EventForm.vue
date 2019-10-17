<template>
    <div>
        <div class="form-group">
            <label for="event">Event Name</label>
            <input v-model="event.title" type="text" class="form-control" id="event" placeholder="Enter event name">
        </div>
        <div class="form-group">
            <label for="start">Start Date</label>
            <datepicker v-model="event.start" input-class="form-control" name="start" id="start"></datepicker>
        </div>
        <div class="form-group">
            <label for="end">End Date</label>
            <datepicker v-model="event.end" input-class="form-control" name="end" id="end"></datepicker>
        </div>
        <div class="form-group">
            <button @click="storeEvent" class="button btn btn-primary">Save</button>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import moment from 'moment';

    export default {
        components: {
            Datepicker
        },

        data () {
            return {
                event: {
                    title: '',
                    start: '',
                    end: ''
                }
            }
        },

        methods: {
            async storeEvent() {
                try {
                    const payload = {
                        ...this.event,
                        start: moment(this.event.start).format('YYYY-MM-DD h:mm:ss'),
                        end: moment(this.event.end).format('YYYY-MM-DD h:mm:ss')
                    };

                    const response = await axios.post('/events', payload);

                    if (response.data) {
                        this.$swal.fire(
                            'Good job!',
                            'You have saved an event!',
                            'success'
                        );

                        this.$eventBus.$emit('EVENT_SET', response.data);
                    }
                } catch (e) {
                    console.log(e.response.data);
                    this.$swal.fire(
                        'Oops!',
                        e.response.data.errors.title[0],
                        'error'
                    )
                }
            }
        }
    }
</script>