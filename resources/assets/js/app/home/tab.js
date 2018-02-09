
export default {
    bindEvents () {

        $('#myTab li:last-child a').tab('show');
    },

    init () {
        this.bindEvents();
    }
}