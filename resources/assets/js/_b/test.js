todos = function () {
    return {
        todos: [
            { id: 1, title: 'купить хлеб', completed: false },
            { id: 2, title: 'продать айфон', completed: false },
            { id: 3, title: 'закончить этот курс', completed: false },
            { id: 4, title: 'перестать быть банальным', completed: false },
        ],
        toggleTodo: function (id) {
            console.log(id);
            var todo = this.todos.find((todo) => todo.id === id);
            todo.completed = !todo.completed;
        },
    };
}


mainPageFilter = function () {
    return {
        vineType: '',
        notified(d) {
            this.vineType = d.detail
            alert(this.vineType)
        }


        // setType

    }
}
