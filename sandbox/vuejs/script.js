let root = new Vue({
    el: '.root',
    data: {
        message: 'Hello, world!',
        name: 'Sergey Sladkov',
    }
});

let game = new Vue({
    el: '.game',
    data: {
        result: 'Игра не началась',
        count: 0,
        seconds: 10,
        isStart: false
    },
    methods: {
        handlerClick: function() {
            this.count++;
        },
        handlerStart: function() {
            //1. поменять фразу "Игра не началась" на "Игра идёт"
            //2. должен работать обратный отсчёт
            //3. если время вышло, а кликов меньше 20, писать "Game over", в противном случае - "You win!"
            this.isStart = true;
            this.result = 'Игра идёт...';
            this.intervalId = setInterval(() => {
                if(this.seconds > 0) {
                    this.seconds--;
                } else {
                    //подводим итоги игры
                    if(this.count >= 20) {
                        this.result = 'You win!';
                    } else {
                        this.result = 'Game over';
                    }
                    this.isStart = false;
                    clearInterval(this.intervalId);
                }
            }, 1000)
        },
        handlerRestart: function() {
            clearInterval(this.intervalId);
            this.init();
        },
        init: function() {
            this.result = 'Игра не началась';
            this.count = 0;
            this.seconds = 10;
            this.isStart = false;
        }
    }
});