export default {
    css: ['~/assets/css/style'],
    head: {
        title: process.env.npm_package_name || '',
        meta: [
            { charset: 'utf-8' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
            { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
        ],
        link: [
            { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
        ]
    },
    router: {

    },
    modules: [
        '@nuxtjs/axios',
        '@nuxtjs/auth-next',
        'bootstrap-vue/nuxt'
    ],
    auth: {
        strategies: {
            local: {
                token: {
                    property: 'token',
                   // global: true,
                    // required: true,
                    type: 'Bearer'
                },
                user: {
                    property: 'user',
                    // autoFetch: true
                },
                endpoints: {
                    login: { url: 'http://localhost:82/auth', method: 'post' },
                }
            }
        }
    }
}
