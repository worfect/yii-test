<template>

</template>

<script>
export default {
  head() {
    // У всех страниц должны быть title и description.
    let title = "Catalog";
    let description = "Catalog";
    return {
      title: title,
      meta: [
        { hid: "description", name: "description", content: description },
        { hid: "og:title", property: "og:title", content: title },
        { hid: "og:description", property: "og:description", content: description },
      ],
    };
  },
};
</script>