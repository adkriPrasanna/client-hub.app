<template>
    <b-table :items="clients" :fields="fields" striped hover>
        <template #table-caption>Clients List</template>
    </b-table>
</template>

<script>
export default {
    name: 'ClientsComponent',
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
            clients: [
                // Example client data
                {
                    name: 'John Doe',
                    gender: 'Male',
                    phone: '123-456-7890',
                    email: 'john.doe@example.com',
                    address: '123 Main St, Anytown, USA',
                    nationality: 'American',
                    dob: '1990-01-01',
                    education: 'Bachelor of Science in Computer Science',
                    contact: 'Email'
                },
                // Add more clients as needed
            ]
        }
    }
}
</script>