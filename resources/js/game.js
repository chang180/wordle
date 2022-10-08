import Tile from './Tile.js'

export default {
    guessesAllowed: 3,
    theWord: 'cat',
    currentRowIndex: 0,
    state : 'active', // pending, active, complete
    message: '',

    get currentGuess() {
        return this.currentRow.map(tile => tile.letter).join('');
    },

    init() {
        this.board = Array.from({ length: this.guessesAllowed }, () => {
            return Array.from({ length: this.theWord.length }, () => new Tile)
        })
    },

    onKeyPress(key) {
        if (/^[A-z]$/.test(key)) {
            this.fillTile(key)
        } else if (key === 'Enter') {
            this.submitGuess()
        }
    },

    fillTile(key) {
        this.message = ''

        for (let tile of this.currentRow) {
            if (!tile.letter) {
                tile.fill(key)
                break;
            }
        }

    },

    get currentRow() {
        return this.board[this.currentRowIndex]
    },

    submitGuess() {
        let guess = this.currentGuess

        if (guess.length < this.theWord.length) {
            return;
        }

        if (guess === this.theWord) {
            this.message = 'You win!'
        } else if (this.guessesAllowed === this.currentRowIndex + 1) {
            this.message = 'You lose!'
            this.state = 'complete'
        } else {
            this.message  = 'Incorrect'
            this.currentRowIndex++
        }

    }

}