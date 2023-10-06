document.addEventListener('alpine:init', () => {
    window.Alpine.data('select', (value) => {
        return {
            // title: title,
            value: value,
            active: false,
            open() {
                this.active = !this.active
            },
            setValue({option}) {
                this.value = option.id
                this.title = option.content.title
                console.log(this.atr);
                if (event) {
                    Livewire.emit(event, option)
                }

            },
            initValue({option = null}) {
                if (option !== null) {
                    this.value = option.id
                    this.title = option.content.title
                }
            },
            init() {
                console.log( value);
            }
/*            active: false,
            value: name,
            title: '',
            open() {
                this.active = !this.active
            },
            outside() {
                this.active = false
            },
            setValue({option}) {
                this.value = option.id
                this.title = option.title
                console.log(this.atr);
                if (event) {
                    Livewire.emit(event, option)
                }

            },
            initValue({option = null}) {
                if (option !== null) {
                    this.value = option.id
                    this.title = option.title
                }
            },*/
        }
    })
})
