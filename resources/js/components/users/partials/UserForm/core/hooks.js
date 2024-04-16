import {computed, ref} from "vue";
import {rules} from './consts'

export function useUserForm(emits) {
    const name = ref("")

    const formIsValid = computed(() => {
        return rules.nameRules
            .map((item) => {
                return item(name.value)
            })
            .every(item => item === true);
    });

    function submitForm() {
        if (!formIsValid.value) return
        emits('add-user', name.value)
        name.value = "";
    }

    return {
        name,
        rules,
        formIsValid,
        submitForm,
    }
}
