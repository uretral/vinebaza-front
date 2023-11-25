document.addEventListener('alpine:init', () => {
    window.Alpine.data('vivinoParser', (php) => {
        return {
            action: 'Отдыхаем',
            test: null,
            startBtn: false,
            php,
            makeStart() {
                if (!this.startBtn && !php.start) {
                    this.startBtn = !this.startBtn
                    Livewire.dispatch('starter')
                } else if (!this.startBtn && php.start) {
                    alert('Завершается пред идущая операция')
                } else {
                    this.startBtn = false
                    Livewire.dispatch('stopper')
                }
            },
            makeTest() {
                Livewire.dispatch('onMakeTest')
            },
            startBtnState() {
                if (!this.startBtn && !php.start) {
                    return 'Можно стартовать'
                }
                if (!this.startBtn && php.start) {
                    return 'Завершается пред идущая операция - ждите'
                }
                return 'Пауза'
            },
            init() {
                console.log(php);
                //
            }
        }
    })
})
