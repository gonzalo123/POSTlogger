var request = require('request');

request.post('http://localhost:8080/Hello', {form: {key: 'value'}}, function (error, response, body) {
    if (!error && response.statusCode == 200) {
        console.log(body)
    }
});