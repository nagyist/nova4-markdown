import Tool from './pages/Tool';
import MarkdownViewerCard from './components/MarkdownViewerCard.vue';

Nova.booting((app, store) => {
  Nova.inertia('NovaMarkdown', MarkdownViewerCard);
  // Nova.intertia('NovaMarkdown', Tool);
  // app.component("nova-markdown", MarkdownViewerCard);
});
