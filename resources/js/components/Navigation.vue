<template>
    <div>
        <h2>Nav Bar</h2>
        <nav>
            <router-link v-for="routes in links"
                         v-bind:key="routes.id"
                         :to="`${routes.page}`">{{routes.text}}</router-link>
        </nav>
    </div>
</template>

<script>
    export default {
        name: 'Navigation',
        data() {
            return {
                links: [
                    {
                        id: 0,
                        text: 'Hello World',
                        page:'/HelloWorld'
                    },
                    {
                        id: 1,
                        text: 'Home',
                        page:'/Home'
                    },
                    {
                        id: 2,
                        text: 'About',
                        page:'/About'
                    },
                    {
                        id: 3,
                        text: 'Contact',
                        page:'/Contact'
                    }
                ]
            }
        }
    }
</script>
<style>
    .spacing {
        Margin-right: 10px;
    }
</style>
