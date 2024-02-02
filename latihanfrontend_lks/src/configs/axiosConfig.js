import axios from "axios";

const http = axios.create ({
    baseURL : 'http://localhost:8000/api/v1', 
    Headers: {
        'Accept': 'Application/json',
        'Content-Type': 'application/json'
    }
})

export default http