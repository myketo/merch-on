export const apiFetch = async (url, options = {}) => {
  const config = useRuntimeConfig();

  if (options.headers === undefined) {
    options.headers = {};
  }
  options.headers.Authorization = `Bearer ${config.apiKey}`;

  if (options.baseURL === undefined) {
    options.baseURL = config.apiBaseUrl;
  }

  return await useFetch(url, options);
};
