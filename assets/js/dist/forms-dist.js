window.onload=function(){const{createApp:e}=Vue;e({data:()=>({submitting:!1,isComplete1:!1,isComplete2:!1,isComplete3:!1,stepNumber:1,errorMsg:"",form:{fullName:"",email:"",companyName:"",companyWebsite:"",projectType:"",projectBudget:"",additionalInformation:""}}),methods:{prevStep(){this.stepNumber--,1===this.stepNumber?this.isComplete1=!1:2===this.stepNumber?this.isComplete2=!1:3===this.stepNumber&&(this.isComplete3=!1)},nextStep(){this.stepNumber++,2===this.stepNumber?this.isComplete1=!0:3===this.stepNumber?this.isComplete2=!0:4===this.stepNumber&&(this.isComplete3=!0)},handleSubmit(){}},mounted(){jQuery("#multi-step-form").on("submit",(function(e){e.preventDefault()}))},delimiters:["${","}"]}).mount("#multi-step-form")};