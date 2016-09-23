<template>
    <div class="file-uploader">
        
        <div class="row medium-up-6" v-show="uploadedFiles.length > 0">
            <div class="column" v-for="image in uploadedFiles">
                <uploadimage :image="image"></uploadimage>
            </div>
        </div>
        <label class="button small secondary">
            {{content}}
            <input type="file" name="{{ name }}" id="{{ id || name }}" class="hide" @change="fileImageChange" multiple="{{ multiple }}">
        </label>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                uploadedFiles: [],
                myFiles: [],
            }
        },
        props: {
            name: {
                type: String,
                required: true
            },
            id: String,
            content: String,
            multiple: String,
            action: {
                type: String,
                required: true
            },
            api: {
                type: String,
                required: true
            },
        },
        events: {
            beforeFileUpload: function(file) {
                console.log(file);
            },
            deletedImage: function(file) {
                this.uploadedFiles.$remove(file);
            }

        },
        methods: {
            fileImageChange() {
                // get the group of files assigned to this field
                var ident = this.id || this.name

                this.myFiles = document.getElementById(ident).files;

                this.fileUpload();
            },
            _handleUpload(file) {
                this.$dispatch('beforeFileUpload', file);
                var form = new FormData();
                try {
                    form.append('Content-Type', file.type || 'application/octet-stream');
                    // our request will have the file in the ['file'] key
                    form.append('file', file);
                } catch (err) {
                    this.$dispatch('onFileError', file, err);
                    return;
                }

                this.$http.post(this.action, form)
                    .then(res => {
                        this.uploadedFiles.push(res.data);
                    }, err => {
                        new Error("File upload field");
                    });
                
            },
            fileUpload: function() {
                var files = this.myFiles;
                if(files.length > 0) {
                    for(var i = 0, len = files.length ; i < len; i++ )
                        this._handleUpload(files[i]);    
                    this.$dispatch('')  
                } else {
                    // someone tried to upload without adding files
                    var err = new Error("No files to upload for this field");
                }
            },
            fetchImages: function() {

                this.$http.get(this.api).then(res => {
                    this.uploadedFiles = res.data;
                });
            }
        },
        ready() {
            this.fetchImages();
        }
    }
</script>

happybirthdaycandy