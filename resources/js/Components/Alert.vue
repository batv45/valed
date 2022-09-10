<template>
    <div class="alert " :class="['alert-'+type,getClass]" role="alert">
        <div class="d-flex" v-if="this.icon !== null">
            <div class="">
                <slot name="icon-body">
                    <div v-html="getIcon"></div>
                </slot>
            </div>
            <div>
                <slot/>
            </div>
        </div>
        <div v-else>
            <slot/>
        </div>
    </div>
</template>

<script>
export default {
    name:'Alert',
    props:{
        type:{
            type: String,
            default:'info',
            required : true,
        },
        icon:{
            type: String,
            default:null
        },
    },
    computed:{
        getClass(){
            if (this.type === 'success'){
                return 'bg-green-lt'
            }else if (this.type === 'info'){
                return 'bg-blue-lt'
            }else if (this.type === 'warning'){
                return 'bg-orange-lt'
            }else if (this.type === 'danger'){
                return 'bg-red-lt'
            }
        },
        getIcon(){
            if(this.icon !== null){
                if (this.type === 'success'){
                    return '<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>'
                }else if (this.type === 'info'){
                    return '<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="12" y1="8" x2="12.01" y2="8"></line><polyline points="11 12 12 12 12 16 13 16"></polyline></svg>'
                }else if (this.type === 'warning'){
                    return '<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 9v2m0 4v.01"></path><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"></path></svg>'
                }else if (this.type === 'danger'){
                    return '<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>'
                }
            }
        }
    },
    mounted() {
    }
}
</script>

<style scoped>

</style>
