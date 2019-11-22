const ShopsFields = [
  {
    name: "created_at",
    title: "Data utworzenia",
    sortField: "created_at",
    callback: "formatDate|D.M.YYYY"
  },
  {
    name: "shop_name",
    title: "Nazwa sklepu",
    sortField: "shop_name"
  },
  {
    name: "city_name",
    title: "Nazwa miasta",
    sortField: "city_name"
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

const ShopsSortOrder = [
  {
    field: "city_name",
    sortField: "city_name",
    direction: "asc"
  }
];

export { ShopsFields, ShopsSortOrder };
