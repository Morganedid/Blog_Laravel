// 1. On importe createApp
import { createApp } from "vue"

// 2. On importe ExampleComponent.vue
import ExampleComponent from "./components/ExampleComponent.vue"

// 3. On monte l'application Vue sur l'élément #app
createApp(ExampleComponent).mount("#app")