<template>
  <div class="nav d-flex justify-content-center">
<<<<<<< HEAD
    <ul class="pagination flex-wrap mb-0">
=======
    <ul class="pagination flex-wrap">
>>>>>>> 404315f... Add Paginator class and Pagination component
      <li 
        v-for="n in numbers" 
        :key="n.key"
        :class="{'active' : n == currentPage}" 
        class="page-item"
      >
        <a 
          class="page-link" 
          href="#" 
          @click.stop.prevent="update(n)"
        >
          {{ n }}
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
import Paginator from "@/utilities/Paginator"

export default {
    name: "Pagination",

    props: {
        items: {
            default() {
                return []
            },
            type: Array
        },

        perPage: {
            default: 12,
            type: Number
        },
    },

    data() {
        return {
            paginator: new Paginator(this.items)
        }
    },

    computed: {
        currentPage() {
            return this.paginator.currentPage
        },

        from() {
            return this.paginator.from
        },

        max() {
            return this.paginator.lastPage
        },

        min() {
            return 1
        },

        numbers() {
            var numbers = [], number
            for(number = this.min; number < this.max + 1; number++) {
                numbers.push(number)
            }
            return numbers
        },

        to() {
            return this.paginator.to
        }
    },

    watch: {
        items() {
            this.paginator.items = this.items
            this.paginator.setCurrentPage()
        }
    },

    methods: {
        update(n){
            this.paginator.setCurrentPage(n)
            this.$emit("pagination-page-change", n)
        },
    },
}
</script>
