<template>
    <div class="container">
        <div v-if="flash.error || flash.success" class="alert text-center"
            :class="{ 'alert-danger': flash.error, 'alert-success': flash.success }">
            {{ flash.error || flash.success }}
            <button type="button" class="close" @click="flash.error = flash.success = null">&times;</button>
        </div>
        <h2 style="text-align: center;">Clients List</h2>
        <table class=" table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th v-for="field in fields" :key="field.key">{{ field.label }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="client in clients" :key="client.name">
                    <td>{{ client.name }}</td>
                    <td>{{ client.gender }}</td>
                    <td>{{ client.phone }}</td>
                    <td>{{ client.email }}</td>
                    <td>{{ client.address }}</td>
                    <td>{{ client.nationality }}</td>
                    <td>{{ client.dob }}</td>
                    <td>{{ client.education }}</td>
                    <td>{{ client.contact }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'ClientListComponent',
    data() {
        return {
            fields: [
                { key: 'name', label: 'Name' },
                { key: 'gender', label: 'Gender' },
                { key: 'phone', label: 'Phone' },
                { key: 'email', label: 'Email' },
                { key: 'address', label: 'Address' },
                { key: 'nationality', label: 'Nationality' },
                { key: 'dob', label: 'Date of Birth' },
                { key: 'education', label: 'Education Background' },
                { key: 'contact', label: 'Preferred Mode of Contact' }
            ],
            clients: [], // Initialize as empty array to be filled with fetched data
            flash: {
                success: null,
                error: null
            },
        };
    },
    mounted() {
        const success = localStorage.getItem('success');
        if (success) {
            this.flash.success = success;
            localStorage.removeItem('success');
        }

        // Fetch data from API
        const API_URL = process.env.VUE_APP_API_URL;
        axios.get(`${API_URL}/client`)
            .then(response => {
                // Access the nested client data array
                const data = response.data.data.original.data;

                // Iterate over the data array
                data.forEach(item => {
                    // Construct an object from the array and append to clients
                    this.clients.push({
                        name: item[0],
                        gender: item[1],
                        phone: item[2],
                        email: item[3],
                        address: item[4],
                        nationality: item[5],
                        dob: item[6],
                        education: item[7],
                        contact: item[8]
                    });
                });
            })
            .catch(error => {
                console.log(error);
                this.flash.success = null;
                this.flash.error = error;
            });
    }
};







</script>