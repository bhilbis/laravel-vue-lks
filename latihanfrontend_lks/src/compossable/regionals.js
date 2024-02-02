import http from '../configs/axiosConfig'
import {ref} from 'vue'

export default function useRegionals(){
    const url = ref('/regional')
    const regionals = ref([])

    const getRegionalLists = async () => {
        const response = await http.get(`${url.value}/list`)

        console.log(response.data)
        regionals.value = response.data.data
    }

    return {
        regionals,
        getRegionalLists,
    }
}