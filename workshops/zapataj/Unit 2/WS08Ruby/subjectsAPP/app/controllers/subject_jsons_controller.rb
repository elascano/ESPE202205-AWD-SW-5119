class SubjectJsonsController < ApplicationController
  before_action :set_subject_json, only: %i[ show update destroy ]

  # GET /subject_jsons
  def index
    @subject_jsons = SubjectJson.all

    render json: @subject_jsons
  end

  # GET /subject_jsons/1
  def show
    render json: @subject_json
  end

  # POST /subject_jsons
  def create
    @subject_json = SubjectJson.new(subject_json_params)

    if @subject_json.save
      render json: @subject_json, status: :created, location: @subject_json
    else
      render json: @subject_json.errors, status: :unprocessable_entity
    end
  end

  # PATCH/PUT /subject_jsons/1
  def update
    if @subject_json.update(subject_json_params)
      render json: @subject_json
    else
      render json: @subject_json.errors, status: :unprocessable_entity
    end
  end

  # DELETE /subject_jsons/1
  def destroy
    @subject_json.destroy
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_subject_json
      @subject_json = SubjectJson.find(params[:id])
    end

    # Only allow a list of trusted parameters through.
    def subject_json_params
      params.require(:subject_json).permit(:name)
    end
end
