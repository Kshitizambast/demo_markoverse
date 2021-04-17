const { default: axios } = require("axios");

const navigation = () => {
    $('#navigation').onClick((event) => {
        event.preventDedault();
        axios.get('/somestring', {

        })
        .then(() => {
            
        })
        .catch(() => {

        })

    });
}