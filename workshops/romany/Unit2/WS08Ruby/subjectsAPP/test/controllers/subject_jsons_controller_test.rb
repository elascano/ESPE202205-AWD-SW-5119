require "test_helper"

class SubjectJsonsControllerTest < ActionDispatch::IntegrationTest
  setup do
    @subject_json = subject_jsons(:one)
  end

  test "should get index" do
    get subject_jsons_url, as: :json
    assert_response :success
  end

  test "should create subject_json" do
    assert_difference("SubjectJson.count") do
      post subject_jsons_url, params: { subject_json: { name: @subject_json.name } }, as: :json
    end

    assert_response :created
  end

  test "should show subject_json" do
    get subject_json_url(@subject_json), as: :json
    assert_response :success
  end

  test "should update subject_json" do
    patch subject_json_url(@subject_json), params: { subject_json: { name: @subject_json.name } }, as: :json
    assert_response :success
  end

  test "should destroy subject_json" do
    assert_difference("SubjectJson.count", -1) do
      delete subject_json_url(@subject_json), as: :json
    end

    assert_response :no_content
  end
end
