window.onload = function() {
    const { createApp } = Vue;

    /**
     * Need:
     *      Step 1 - Contact Details: Name, Email, Company Name, Company Website
     *      Step 2 - Select Project Type: Full Website, Landing Page, Theme Development, SPA Development
     *      Step 3 - Project Details: Changes based on Project Type
     *      Step 4 - Project Budget: $1,000 - $5,000, $5,000 - $10,000, $10,000 - $20,000, $20,000+
     *      Step 5 - Additional Details (400 char limit)
    */

    createApp({
        data() {
            return {
                showError: false,
                submitting: false,
                isComplete1: false,
                isComplete2: false,
                isComplete3: false,

                stepNumber: 1,

                form: {
                    fullName: '',
                    email: '',
                    companyName: '',
                    companyWebsite: '',

                    projectType: '',
                    projectBudget: '',
                    additionalInformation: '',
                },
            };
        },

        methods: {
            prevStep() {
                this.stepNumber--;

                if(this.stepNumber === 1) {
                    this.isComplete1 = false;
                } else if(this.stepNumber === 2) {
                    this.isComplete2 = false;
                } else if(this.stepNumber === 3) {
                    this.isComplete3 = false;
                }
            },

            nextStep() {
                this.stepNumber++;

                if(this.stepNumber === 2) {
                    this.isComplete1 = true;
                } else if(this.stepNumber === 3) {
                    this.isComplete2 = true;
                } else if(this.stepNumber === 4) {
                    this.isComplete3 = true;
                }
            },

            handleSubmit() {}
        },

        mounted() {
            // temp jquery placeholder - will be replaced with vue js
            jQuery('#multi-step-form').on('submit', function(e) {
                e.preventDefault();
            });
        },

        delimiters: ['${', '}']
    }).mount('#multi-step-form');
}