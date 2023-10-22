document.addEventListener('alpine:init', () => {
    window.Alpine.data('selectHorizontal', (data) => {
        return {
            model: data.model,
            active: false,
            title: data.current.name,
            value: data.current.id,
            codeTitle: data.title,
            codeId: data.id,
            setValues(ob) {
                this.model = ob[this.codeId]
                this.title = ob[this.codeTitle]
                this.active = false
            },
        }
    })
})
