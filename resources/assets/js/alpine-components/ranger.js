document.addEventListener('alpine:init', () => {
    window.Alpine.data('ranger', (value) => {
        return {
            min: value.min,
            max: value.max,
            rangeInputMin: value.rangeInputMin,
            rangeInputMax: value.rangeInputMax,
            staticMax: value.staticMax,
            gap: value.gap,
            left: null,
            right: null,
            live: 0,

            get style() {
                return `left: ${this.left}; right: ${this.right} ;`
            },

            updateMin() {
                if ((parseFloat(this.max) - parseFloat(this.min) >= this.gap) && parseFloat(this.max) <= this.rangeInputMax.max) {
                    this.rangeInputMin = parseFloat(this.min);
                    this.left = ((parseFloat(this.min) / this.staticMax) * 100) + "%";
                }
            },
            updateMax() {
                if ((parseFloat(this.max) - parseFloat(this.min) >= this.gap) && parseFloat(this.max) <= this.rangeInputMax.max) {
                    this.rangeInputMax = parseFloat(this.max);
                    this.right = 100 - (parseFloat(this.max) / this.staticMax) * 100 + "%";
                }
            },

            slideMin() {
                if ((parseFloat(this.rangeInputMax) - parseFloat(this.rangeInputMin)) < this.gap) {
                    this.rangeInputMin = parseFloat(this.rangeInputMax) - this.gap
                } else {
                    this.sliderStyle()
                }
            },
            slideMax() {

                if ((parseFloat(this.rangeInputMax) - parseFloat(this.rangeInputMin)) < this.gap) {
                    this.rangeInputMax = parseFloat(this.rangeInputMin) + this.gap;
                } else {
                    this.sliderStyle()
                }
            },

            sliderStyle() {
                this.min = parseFloat(this.rangeInputMin);
                this.max = parseFloat(this.rangeInputMax);
                this.initialsStyles()
            },

            initialsStyles() {
                this.left = ((parseFloat(this.rangeInputMin) / this.staticMax) * 100) + "%";
                this.right = 100 - (parseFloat(this.rangeInputMax) / this.staticMax) * 100 + "%";
            },
            trigger() {
                Livewire.dispatch('change-state')
            },
            init() {
                this.initialsStyles()

            }
        }
    })
})
