import { View, Text, StyleSheet } from 'react-native';
import NavBar from '../nav-bar';
import TopBar from '../top-bar';

export default function Trash() {
  return (
    <View style={styles.container}>
      <TopBar />
      <View style={styles.content}>
        <Text style={styles.title}>Corbeille</Text>
      </View>
      <NavBar />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
  },
  content: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    color: '#362E7D',
  },
});
