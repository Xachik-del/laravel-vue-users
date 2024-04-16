const regex = /^(?:\d{1,12}|[a-zA-Z]+)$/;

export const rules = {
    nameRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 12) || 'Name must be less than 12 characters',
        v => regex.test(v) || 'The name must contain only numbers, or only letters',
    ],
}

