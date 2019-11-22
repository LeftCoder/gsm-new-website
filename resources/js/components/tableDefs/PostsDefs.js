const PostsFields = [
  {
    name: "created_at",
    title: "Data utworzenia",
    sortField: "created_at",
    callback: "formatDate|D.M.YYYY"
  },
  { name: "title", title: "Tytuł", sortField: "title" },
  {
    name: "updated_at",
    title: "Ostatnia aktualizacja",
    sortField: "updated_at",
    callback: "formatDate|D.M.YYYY H:m:s"
  },
  {
    name: "__slot:actions",
    title: "Zarządzaj",
    width: "5%",
    dataClass: "text-center"
  },
  {
    name: "__slot:published",
    title: "Opublikowany",
    width: "5%",
    dataClass: "text-center"
  }
];

const PostsSortOrder = [
  {
    field: "title",
    sortField: "title",
    direction: "desc"
  }
];

export { PostsFields, PostsSortOrder };
