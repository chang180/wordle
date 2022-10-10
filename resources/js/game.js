import Tile from './Tile.js';
import words from './words.js';

export default {
    guessesAllowed: 3,
    theWord: 'cat',
    currentRowIndex: 0,
    state: 'active', // pending, active, complete
    message: '',
    errors: false,

    letters: [
        'QWERTYUIOP'.split(""),
        'ASDFGHJKL'.split(""),
        ['Enter',...'ZXCVBNM'.split(""), 'Backspace'],
    ],


    get currentRow() {
        return this.board[this.currentRowIndex]
    },

    get currentGuess() {
        return this.currentRow.map(tile => tile.letter).join('');
    },

    get remainingGuesses() {
        return this.guessesAllowed - this.currentRowIndex;
    },

    init() {
        this.board = Array.from({ length: this.guessesAllowed }, () => {
            return Array.from({ length: this.theWord.length }, (item, index) => new Tile(index))
        })
    },

    onKeyPress(key) {
        this.erroes = false

        if (/^[A-z]$/.test(key)) {
            this.fillTile(key)
        } else if (key === 'Backspace') {
            this.emptyTile()
        } else if (key === 'Enter') {
            this.submitGuess()
        }
    },

    emptyTile() {
        for (let tile of [...this.currentRow].reverse()) {
            if (tile.letter) {
                tile.empty()
                break;
            }
        }
    },

    fillTile(key) {
        for (let tile of this.currentRow) {
            if (!tile.letter) {
                tile.fill(key)
                break;
            }
        }
    },

    submitGuess() {
        if (this.currentGuess.length < this.theWord.length) {
            return;
        }

        if (! words.includes(this.currentGuess.toUpperCase())) {
            this.errors = true
            this.message = 'Invalid word...'
        }
        
        for (let tile of this.currentRow) {
            tile.updateStatus(this.theWord)
        }

        Tile.updateStatusesForRow(this.currentRow, this.theWord)

        if (this.currentGuess === this.theWord) {
            this.state = 'complete'
            return this.message = 'You win!'
        }

        if (this.remainingGuesses === 0) {
            this.message = 'You lose!'
            return this.state = 'complete'
        }

        this.currentRowIndex++

        return this.message = 'Incorrect'

    },

}