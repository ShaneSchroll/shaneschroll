/**
    * Need:
    *      Step 1 - Contact Details: Name, Email, Company Name, Company Website
    *      Step 2 - Select Project Type: Full Website, Landing Page, Theme Development, SPA Development
    *      Step 3 - Project Details: Changes based on Project Type
    *      Step 4 - Project Budget: $1,000 - $5,000, $5,000 - $10,000, $10,000 - $20,000, $20,000+
    *      Step 5 - Additional Details (400 char limit)
*/

import { createApp } from 'vue';

createApp({
    data() {
        return {
            isComplete1: false,
            isComplete2: false,
            isComplete3: false,

            is_submitting: false,
            name_error: false,
            email_error: false,

            stepNumber: 1,
            error: [],

            fullName: '',
            email: '',
            companyName: '',
            companyWebsite: '',

            projectType: [
                { id: 1, project_name: 'Full Website' },
                { id: 2, project_name: 'Landing Page' },
                { id: 3, project_name: 'Theme Development' },
                { id: 4, project_name: 'SPA Development' },
            ],
            projectBudget: '',
            additionalInformation: '',
        };
    },

    watch: {
        // working but need a way to trigger for each input separately
        email(value) {
            if (value === '') {
                this.email_error = true;
            } else {
                this.email_error = false;
            }
        },

        fullName(value) {
            if (value === '') {
                this.name_error = true;
            } else {
                this.name_error = false;
            }
        },

        // check for projectType length to check if we need to add the error class
    },

    methods: {
        prevStep() {
            this.stepNumber--;

            // check what step we are on to style the progress bar accordingly
            if (this.stepNumber === 1) {
                this.isComplete1 = false;
            } else if (this.stepNumber === 2) {
                this.isComplete2 = false;
            } else if (this.stepNumber === 3) {
                this.isComplete3 = false;
            }
        },

        nextStep() {
            this.stepNumber++;

            // check what step we are on to style the progress bar accordingly
            if (this.stepNumber === 2) {
                this.isComplete1 = true;
            } else if (this.stepNumber === 3) {
                this.isComplete2 = true;
            } else if (this.stepNumber === 4) {
                this.isComplete3 = true;
            }
        },

        handleSubmit() {}
    },

    mounted() {},

    delimiters: ['${', '}']
}).mount('#multi-step-form');