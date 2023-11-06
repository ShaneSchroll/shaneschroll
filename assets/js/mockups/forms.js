window.onload = function() {
    const { createApp } = Vue;

    /**
     * Need:
     *      Step 1 - Contact Details: Name, Email, Phone Number, Company Name
     *      Step 2 - Select Project Type: Full Website, Landing Page, Theme Development, SPA Development
     *      Step 3 - Project Details: Changes based on Project Type
     *      Step 4 - Project Budget: $1,000 - $5,000, $5,000 - $10,000, $10,000 - $20,000, $20,000+
     *      Step 5 - Additional Details (400 char limit)
    */

    createApp({
        data() {
            return {
                full_name: '',
                email: '',
                company_name: '',
                company_website: '',
                project_type: '',
                project_budget: '',
                additional_details: '',
            };
        },

        delimiters: ['${', '}']
    }).mount('#multi-step-form');
}