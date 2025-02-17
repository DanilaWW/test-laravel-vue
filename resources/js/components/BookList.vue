<template>
    <div class="table-container">
        <select class="styled-select" v-model="selectedAuthor" @change="filterBooks">
            <option value="">Все авторы</option>
            <option v-for="author in authors" :key="author.id" :value="author.id">
                {{ author.name }}
            </option>
        </select>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>№ п/п</th>
                    <th class="title">Название книги</th>
                    <th class="author">Авторы</th>
                    <th>Количество</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(book, index) in filteredBooks" :key="book.id">
                    <td>{{ index + 1 }}</td>
                    <td class="title">{{ book.title }}</td>
                    <td class="author">{{ book.authors.map(author => author.name).join(', ') }}</td>
                    <td>{{ book.authors.length }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            books: [],
            authors: [],
            selectedAuthor: '',
            filteredBooks: []
        };
    },
    methods: {
        fetchBooks() {
            axios.get('/api/books')
                .then(response => {
                    this.books = response.data;
                    this.filteredBooks = response.data;
                });
        },
        fetchAuthors() {
            axios.get('/api/authors')
                .then(response => {
                    this.authors = response.data;
                });
        },
        filterBooks() {
            if (this.selectedAuthor) {
                this.filteredBooks = this.books.filter(book =>
                    book.authors.some(author => author.id === this.selectedAuthor)
                );
            } else {
                this.filteredBooks = this.books;
            }
        }
    },
    mounted() {
        this.fetchBooks();
        this.fetchAuthors();
    }
};
</script>

<style scoped>
.table-container {
  margin: 20px;
  font-family: Arial, sans-serif;
}

.styled-select {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: #fff;
  color: #333;
}

.styled-select:hover,
.styled-select:focus {
  border-color: #009879;
  outline: none;
}

.styled-table {
  width: 100%;
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 18px;
  text-align: left;
}

.styled-table th,
.styled-table td {
  padding: 12px 15px;
}

.styled-table td.author, .styled-table td.title, .styled-table th.author, .styled-table th.title {
  width: 40%;
}

.styled-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
}

.styled-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.styled-table tbody tr:hover {
  background-color: #f1f1f1;
}
</style>