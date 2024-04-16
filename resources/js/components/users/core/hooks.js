import {onMounted, ref} from "vue";
import axios from "axios";

export function useUsers() {
  const users = ref([]);

  const fetchUsers = () => {
    axios.get("/api/users")
      .then(response => {
        users.value = response.data;
      })
      .catch(err => console.log(err))
  }

  onMounted(() => {
    fetchUsers()
  })

  const addUser = name => {

    axios.post("/api/users", {name})
      .then(response => {
        users.value.unshift(response.data);
      })
      .catch(err => console.log(err))
  }

  return {
    users,
    addUser,
  }
}
