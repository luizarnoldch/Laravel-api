<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header"><h4>Editar Blog</h4></div>
        </div>
        <div class="card-body">
          <form @submit.prevent="actualizar">
            <div class="row">
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label>Título</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="blog.titulo"
                  />
                </div>
                <div class="form-group">
                  <label for="floatingTextarea2">Contenido</label>
                  <textarea
                    class="form-control"
                    id="floatingTextarea2"
                    v-model="blog.contenido"
                    style="height: 100px"
                  >
                  </textarea>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "editar-blog",
  data() {
    return {
      blog: {
        titulo: "",
        contenido: "",
      },
    };
  },
  mounted() {
    this.mostrarBlog();
  },
  methods: {
    async mostrarBlog() {
      this.axios
        .get(`/api/blog/${this.$route.params.id}`)
        .then((response) => {
          const { titulo, contenido } = reponse.data;
          this.blog.titulo = titulo;
          this.blog.contenido = contenido;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    async actualizar() {
      this.axios
        .put(`/api/blog/${this.$route.params.id}`, this.blog)
        .then((response) => {
          this.$router.push({
            name: "mostrarBlogs",
          });
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>