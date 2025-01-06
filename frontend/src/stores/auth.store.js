import { defineStore } from 'pinia';
import router from '@/router';
import axios from 'axios';

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: {
            'name': '',
            'email': '',
        },
        isAuthenticated: null,
        flash: '',
        errors: {},
    }),
    actions: {
        async login(credentials) {
            await axios.get('/sanctum/csrf-cookie');

            try {

                const response = await axios.post('/api/v1/login', credentials)

                if (response.data && response.status === 200) {
                    this.user = response.data;
                    this.isAuthenticated = true;

                    router.push('/home');
                }

            } catch (error) {
                if (error) {
                    this.errors.value = { message: error.response.data.message };
                } else {
                    this.errors.value = { message: 'An error occurred. Please try again later.' };
                }
            }

        },
        async register(credentials) {
            await axios.get('/sanctum/csrf-cookie');

            try {

                const response = await axios.post('/api/v1/register', credentials)

                if (response.data && response.status === 201) {
                    this.flash = response.data.message;

                    router.push('/login');
                }

            } catch (error) {
                if (error) {
                    this.errors.value = { message: error.response.data.message };
                } else {
                    this.errors.value = { message: 'An error occurred. Please try again later.' };
                }
            }
        },

        async user() {
            try {

                const repsonse = await axios.get('/api/v1/user');
                this.user = repsonse.data;
                this.isAuthenticated = true;

            } catch (error) {
                console.error('User not authenticated', error);
                this.user = null;
                this.isAuthenticated = false;
            }
        },
        async logout() {
            await axios.post('/api/v1/logout');
            this.user = null;
            this.isAuthenticated = false;

            router.push('/login');
        },
        clearErrors() {
            this.errors = {};
        },
    }
});